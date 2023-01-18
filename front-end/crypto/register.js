import crypto from 'crypto'

function generateRSAKeyPair(password) {
  const { publicKey, privateKey } = crypto.generateKeyPairSync('rsa', {
    modulusLength: 2048,
  })

  const privateKeyPem = privateKey.export({
    type: 'pkcs8',
    format: 'pem',
    cipher: 'aes-256-cbc',
    passphrase: password,
  })

  const publicKeyPem = publicKey.export({
    type: 'pkcs1',
    format: 'pem',
    })

  return { publicKeyPem, privateKeyPem }
}



function isValidPassword(password) {
    const hasCapitalLetter = /[A-Z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    return hasCapitalLetter && hasNumber && hasSymbol;
}

function checkIfAgeIsValid(age) {
    const date = new Date(age);
    const sixteenYearsAgo = new Date();
    sixteenYearsAgo.setFullYear(sixteenYearsAgo.getFullYear() - 16);
    return date < sixteenYearsAgo;
}

export {
    generateRSAKeyPair,
    isValidPassword,
    checkIfAgeIsValid,
}