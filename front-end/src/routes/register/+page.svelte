<script>
    /**
         * @type {{ success: any; }}
         */
    export let form;
    
     /**
         * @type {{ emails: any; }}
         */
    export let data;
    console.log(form)
</script>
    
    <h1>Register</h1>
    <form method="POST" action="?/register">
        <label for="email">Username:</label>
        <input name="email" type="email">
        <label for="email">Email:</label>
        <input name="email" type="email">
        <label for="email">Email:</label>
        <input name="email" type="email">
        <label for="email">Email:</label>
        <input name="email" type="email">
        <button formaction="?/register">sub</button>
    </form>
    
    {#if form?.success}
       <div>SUCESSS!!</div> 
    {/if}
    
    {#each data?.emails as email }
        <p>{email}</p>
    {/each}
