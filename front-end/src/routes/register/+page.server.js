
/** @type {import('./$types').Actions} */
export const actions = { 
    register: async ({request}) => {
        const formData = await request.formData()
        console.log(formData)
        const age = formData.get('age')
        const date = new Date(age);
        const sixteenYearsAgo = new Date();
        sixteenYearsAgo.setFullYear(sixteenYearsAgo.getFullYear() - 16);

        console.log(date < sixteenYearsAgo)
        if (!(date < sixteenYearsAgo)) {
            console.log('yes')
            return {errorAge: true, message: 'Must be 16 years old or older'}
        }

        return {success: true}
	}
}