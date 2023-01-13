<script>
  import { page } from '$app/stores';

  export let data;

</script>

<h1>Catalogue List</h1>
<div>
  {#each data.catalogue.items as item}
    <div>
      <h2>{item.name}</h2>
      <p>{item.quantity}{item.unit}</p>
      <a href="/catalogues/{$page.params.catalogueId}/items/{item.id}">{item.name}</a>
    </div>
  {/each}
</div>