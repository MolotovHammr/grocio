import { SECRET_CATALOGUE_SERVICE_URL } from '$env/static/private'
import store from '../../Store.js'

console.log(store);

export async function load(){
    const res = await fetch(`${SECRET_CATALOGUE_SERVICE_URL}/api/items/catalogues/${store.get().groupId}`)
}