<script>
    /**
         * @type {{ success: any; }}
         */
    export let form;
    
     /**
         * @type {{ emails: any; }}
         */
    export let data;
</script>
    
    <h1>Register</h1>
    <form method="POST" action="?/register">
        <div>
            <label for="username">Username (saved in database, keep ambiguous):</label>
            <input name="username" type="username">
        </div>
        <div>
            <label for="password">Password (Not stored in database, so make sure to remember it):</label>
            <input name="password" type="password">
        </div>
        <div>
        <div>These values will be saved in an encrypted manner, even we will not be able to see them</div>
        <div>
            <label for="name">name:</label>
            <input name="name" type="text">
        </div>
        <div>
            <label for="email">Email:</label>
            <input name="email" type="email">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input name="phone" type="tel">
        </div>
        <div>
            <label for="age">Age:</label>
            <input name="age" type="date">
            {#if form?.message}
                <div class="error">{form?.message}</div>
            {/if}
        </div>
    </div>
        <button formaction="?/register">Register</button>
    </form>
    
