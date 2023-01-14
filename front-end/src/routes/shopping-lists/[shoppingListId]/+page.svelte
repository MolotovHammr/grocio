<script>
  import { page } from '$app/stores';

  export let data;
  console.log(data.shoppingList.active_items);
</script>

<a href="/">Back</a>
<h1>Shopping list</h1>
<div>
  {#each data.shoppingList.active_items as active_item}
    <div>
      <h2><a href="/catalogues/{$page.params.shoppingListId}/items/{active_item.item.catalogue_item_id}">{active_item.item.name}</a></h2>
      <p>{active_item.amount}</p>
      <p>{active_item.added_at}</p>
    </div>
  {/each}
</div>