export const load = async ({params}) => {
    console.log(params)
    const res = await fetch(`/api/items/catalogues/1`)
    const data = await res.json()
    console.log(data)
    return data
}