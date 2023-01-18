import crypto from 'crypto';

function decryptRSAPrivateKey(privateKeyPem, password) {

    try {
        const privateKey = crypto.createPrivateKey({
            key: privateKeyPem,
            format: 'pem',
            type: 'pkcs8',
            passphrase: password,
        })
        return privateKey
    } catch (error) {
        return false
    }  
}

export { decryptRSAPrivateKey }