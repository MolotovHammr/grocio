import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'

export async function load({params}){
    console.log(params)
    console.log(`${SECRET_CATALOGUE_SERVICE_URL}/api/catalogues/${params.catalogueId}/items/${params.itemId}`)
    const res = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/catalogues/${params.catalogueId}/items/${params.itemId}`)
    const data = await res.json()
    console.log(data.item)
    return data.item
}