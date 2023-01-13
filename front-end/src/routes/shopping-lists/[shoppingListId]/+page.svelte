<script>
  import { page } from '$app/stores';

  export let data;
</script>

<a href="/">Back</a>
<h1>Shopping list</h1>
<div>
  {#each data.shoppingList.active_items as item}
    <div>
      <h2><a href="/catalogues/{$page.params.catalogueId}/items/{item.id}">{item.name}</a></h2>
      <p>{item.amount}</p>
      <p>{item.added_at}</p>
    </div>
  {/each}
</div>