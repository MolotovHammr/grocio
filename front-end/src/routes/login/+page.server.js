import crypto from 'crypto'
import { decryptRSAPrivateKey } from '../../../crypto/login'
import { encryptAES256, decryptAES256 } from '../../../crypto/cryption'
import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()


/** @type {import('./$types').Actions} */
export const actions = {
    login: async ({ request }) => {
        const formData = await request.formData()
        const username = formData.get('username')
        const password = formData.get('password')

        //Check if username is already taken
        const user = await prisma.user.findUnique({
            where: {
                username: username
            },
        })

        if (!user) {
            return { errorUsername: true, messageUsername: 'Username does not exist!' }
        }

        console.log(user)
        let privateKey = decryptRSAPrivateKey(user.privateKey, password)

        if (!privateKey) {
            return { errorPassword: true, messagePassword: 'Password is incorrect!' }
        }

        let userDataKeys = await prisma.userDataKeys.findMany({
            where: {
                userId: user.id,
                linkedUser: user.id
            },
            include: {
                userData: true
            }
        })

        // decrypt userDataKey with privateKey 
        let decryptedKey = crypto.privateDecrypt(privateKey, Buffer.from(userDataKeys[0].key, 'base64'))

        // decrypt userData with decryptedKey
        let decryptedUserDataString = decryptAES256(userDataKeys[0].userData.userData, decryptedKey)

        let decryptedUserData = JSON.parse(decryptedUserDataString)

        let userStoreData = {
            id: user.id,
            username: user.username,
            privateKey: user.privateKey,
            publicKey: user.publicKey,
            userData: decryptedUserData,
        }

        let userStoreDataString = JSON.stringify(userStoreData)

        return { success: true, user: userStoreDataString }
    }
}
