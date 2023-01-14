import { SECRET_SHOPPING_LIST_SERVICE_URL } from '$env/static/private'


export async function load({params}){
    console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const res = await fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const data = await res.json()
    return data
}

export const actions = {
    add: async ({request}) => {
        const formData = await request.formData()
        console.log(formData)
        console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items/${formData.get('activeItemId')}/increase`)
        fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items/${formData.get('activeItemId')}/increase`, {
            method: 'POST',
        })
    },

    decrease: async ({request}) => {
        const formData = await request.formData()
        console.log(formData)
        console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items/${formData.get('activeItemId')}/decrease`)
        fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items/${formData.get('activeItemId')}/decrease`, {
            method: 'POST',
        })
    }
}
