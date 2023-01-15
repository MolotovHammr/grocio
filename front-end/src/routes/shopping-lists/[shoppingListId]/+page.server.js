import { SECRET_SHOPPING_LIST_SERVICE_URL } from '$env/static/private'


export async function load({params}){
    console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const res = await fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const data = await res.json()
    console.log(data.shoppingList)
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
    },

    addActiveItem: async ({request}) => {
        const formData = await request.formData()
        console.log(formData)
        console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items`)
        const response = await fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${formData.get('shoppingListId')}/active-items`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({
                item_id: formData.get('items-input'),
                shopping_list_id: formData.get('shoppingListId'),
                amount: 1
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
