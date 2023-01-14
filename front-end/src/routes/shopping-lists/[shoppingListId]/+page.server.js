import { SECRET_SHOPPING_LIST_SERVICE_URL } from '$env/static/private'


export async function load({params}){
    console.log(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const res = await fetch(`${SECRET_SHOPPING_LIST_SERVICE_URL}/api/shopping-lists/${params.shoppingListId}`)
    const data = await res.json()
    console.log(data)
    return data
}