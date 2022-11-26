<form 
    class="form-inline my-2 my-lg-0" 
    method="get" 
    action="./search-results.php">
            <input 
                class="form-control mr-sm-2" 
                name="s" 
                value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" 
                type="search" 
                placeholder="Search" 
                aria-label="Search">
            <button 
                class="btn btn-outline-success my-2 my-sm-0" 
                type="submit">
                Search
            </button>
</form>
