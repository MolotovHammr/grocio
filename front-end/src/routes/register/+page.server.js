import crypto from 'crypto'
import {generateRSAKeyPair, isValidPassword, checkIfAgeIsValid} from '../../../crypto/register'
import {encryptAES256, decryptAES256} from '../../../crypto/cryption'
import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()

/** @type {import('./$types').Actions} */
export const actions = { 
    register: async ({request}) => {
        const formData = await request.formData()
        const username = formData.get('username')
        const password = formData.get('password')
        const age = formData.get('age')
        
        //Check if username is already taken
        const userExists = await prisma.user.findUnique({
            where: {
                username: username
            }
        })

        if(userExists){
            return {errorUsername: true, messageUsername: 'Username already taken!'}
        }

        //Check if password is valid
        if(!isValidPassword(password)){
            return {errorPassword: true, messagePassword: 'Password must contain at least one capital letter, one number, and one symbol'}
        }

        //Check if user is 16 years old or older
        
        if (!checkIfAgeIsValid(age)) {
            console.log('yes')
            return {errorAge: true, message: 'Must be 16 years old or older'}
        }

        //Generate Public and Private keys for User with encrypted private key
        let keys = generateRSAKeyPair(password)

        //Create User in Database
        const user = await prisma.user.create({
            data: {
                username: username,
                publicKey: keys.publicKeyPem,
                privateKey: keys.privateKeyPem,
            }
        })

        let userDataObject = {
            firstName : formData.get('firstName'),
            lastName : formData.get('lastName'),
            email : formData.get('email'),
            phoneNumber : formData.get('phone'),
            age : formData.get('age'),
        }


        //Encrypt User Data with random key
        let randomKey = crypto.randomBytes(32);
        let encryptedUserData = encryptAES256(JSON.stringify(userDataObject), randomKey)

        //Store encrypted user data in database
        const userData = await prisma.userData.create({
            data: {
                userData: encryptedUserData,
            }
        })
            

        console.log(userData)

        //Encrypt random key with user's public key
        let encryptedKey = crypto.publicEncrypt(keys.publicKeyPem, Buffer.from(randomKey))

        //Store encrypted key in database
        const encryptedKeyData = await prisma.userDataKeys.create({
            data: {
                userId: user.id,
                linkedUser:user.id,
                key: encryptedKey.toString('base64'),
                userDataId: userData.id,
            }
        })

        return {success: true}
	}
}