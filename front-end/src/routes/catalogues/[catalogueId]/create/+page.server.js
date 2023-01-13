import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'

export const actions = {
    create: async ({request}) => {
        const formData = await request.formData()
        console.log(formData)
        const name = formData.get('name')
        const quantity = formData.get('quantity')
        const unit = formData.get('unit')
        const energy = formData.get('energy')
        const total_fat = formData.get('total_fat')
        const saturated_fat = formData.get('saturated_fat')
        const total_carbohydrates = formData.get('total_carbohydrates')
        const sugars = formData.get('sugars')
        const protein = formData.get('protein')
        const salt = formData.get('salt')
        const catalogue_id = formData.get('catalogueId')
        console.log(catalogue_id, name, quantity, unit, energy, total_fat, saturated_fat, total_carbohydrates, sugars, protein, salt)
        console.log(`/${SECRET_CATALOGUE_SERVICE_URL}/api/catalogues/${catalogue_id}/items`)
        console.log(JSON.stringify({
            name,
            quantity,
            unit,
            energy,
            total_fat,
            saturated_fat,
            total_carbohydrates,
            sugars,
            protein,
            salt,
            catalogue_id
        }))

        const response = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/catalogues/${catalogue_id}/items`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({
                name,
                quantity,
                unit,
                energy,
                total_fat,
                saturated_fat,
                total_carbohydrates,
                sugars,
                protein,
                salt,
                catalogue_id
            })
        })
        console.log( await response)
        const data =  await response.json()
        console.log(data)
        return {
            success: true,
            data
        }
    }
}