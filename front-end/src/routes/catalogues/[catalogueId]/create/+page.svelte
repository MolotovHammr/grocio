<script>
    import { page } from '$app/stores';
  
    export let data;

    export let form
    console.log(form?.success)
</script>

<a href="/catalogues/{$page.params.catalogueId}">Back</a>
<form method="POST" action="?/create" >
    <h1>Create Item</h1>
    {#if form?.success}
    <div>Item successfully created!</div> 
    {/if}
    
    <div>
        <label for="name">Name</label>
        <input name="name" type="text">
    </div>
    <div>
        <label for="quantity">Quantity</label>
        <input name="quantity" type="number">
    </div>
    <div>
        <label for="unit">Unit</label>
        <select name="unit">
            <option value="g">g</option>
            <option value="ml">l</option>
        </select>
    </div>
    <div>
        <label for="energy">Energy</label>
        <input name="energy" type="number">
    </div>
    <div>
        <label for="total_fat">Total fat</label>
        <input step="0.01"  name="total_fat" type="">
    </div>
    <div>
        <label  for="saturated_fat">Saturated fat</label>
        <input step="0.01"  name="saturated_fat" type="number">
    </div>
    <div>
        <label for="total_carbohydrates">Total carbohydrates</label>
        <input step="0.01"  name="total_carbohydrates" type="number">
    </div>
    <div>
        <label for="sugars">Sugars</label>
        <input step="0.01"  name="sugars" type="number">
    </div>
    <div>
        <label for="protein">Protein</label>
        <input step="0.01"  name="protein" type="number">
    </div>
    <div>
        <label for="salt">Salt</label>
        <input step="0.01"  name="salt" type="number">
    </div>
    <div>
        <label for="price">Price (&euro;)</label>
        <input step="0.01"  name="price" type="number">
    </div>
    <input name="catalogueId" type="hidden" value="{$page.params.catalogueId}">
    <button formaction="?/create">Create</button>
</form>

