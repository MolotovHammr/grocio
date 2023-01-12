<script>
  export let data;

</script>

<h1>Catalogue List</h1>
<div>
    <ul>
        {#each data as item}
        <li>
            <a href="/catalogue/{item.id}">{item.name}</a>
        </li>
        {/each}
    </ul>
</div>