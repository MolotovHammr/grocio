<script>
  import { page } from '$app/stores';
  export let addServer;
  export let data;
</script>

<a href="/">Back</a>
<h1>Shopping list</h1>

<div>
  {#each data.shoppingList.active_items as active_item}
    <div>
      <h2><a href="/catalogues/{$page.params.shoppingListId}/items/{active_item.item.catalogue_item_id}">{active_item.item.name}</a></h2>
      <form method="POST" action="?/create" >
        <input name="activeItemId" type="hidden" value="{active_item.id}">
        <input name="shoppingListId" type="hidden" value="{$page.params.shoppingListId}">
        <button formaction="?/add">+</button>
      </form>
      <form method="POST" action="?/decrease" >
        <input name="activeItemId" type="hidden" value="{active_item.id}">
        <input name="shoppingListId" type="hidden" value="{$page.params.shoppingListId}">
        <button formaction="?/decrease">-</button>
      </form>
      <p>{active_item.amount}</p>
      <p>{active_item.added_at}</p>
    </div>
  {/each}
</div>