<script>
  import { page } from '$app/stores';

  export let data;
</script>

<a href="/">Back</a>
<h1>Shopping ist</h1>
<a href="/catalogues/{$page.params.catalogueId}/create">Create</a>
<div>
  {#each data.catalogue.items as item}
    <div>
      <h2><a href="/catalogues/{$page.params.catalogueId}/items/{item.id}">{item.name}</a></h2>
      <p>{item.quantity}{item.unit}</p>
    </div>
  {/each}
</div>