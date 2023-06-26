
<?php 
global $countBulk;
;?>
<div class="countPage">
    <div class="alert alert-primary counters"></div>
</div>


<script>
setInterval(()=>{

    document.querySelector('.counters').innerHTML = `Pages created <?php echo $_POST['countPost'] ?? 0;?>`;

},1000);

if(document.querySelector('.alert')!==null){
    document.querySelectorAll('.alert').forEach(x=>{
        document.querySelector('.counters').insertAdjacentElement('beforebegin',x);
    })
}
</script>