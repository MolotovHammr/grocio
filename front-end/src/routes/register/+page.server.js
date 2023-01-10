let emails = []

export const load = () => {
    return {
        emails
    }
}

/** @type {import('./$types').Actions} */
export const actions = { 
    register: async ({request}) => {
        const formData = await request.formData()
        emails.push(formData.get('email'))

        return {success: true}
	}
}