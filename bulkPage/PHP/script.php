 

<script>
    if (document.querySelector('#static') != null) {


        document.querySelector('#static').insertAdjacentHTML('beforebegin', '<input type="text" class="form-control searchBulk mt-2" placeholder="search" onkeyup="check()">');


        function check() {

            const val = document.querySelector('.searchBulk').value.toLowerCase();

            document.querySelectorAll('tbody tr').forEach(c => {
                c.classList.add('d-none');

                const td = c.querySelector('a').innerHTML.toLowerCase();


                if (td.includes(val)) {
                    c.classList.remove('d-none');
                }else if(val == ''){
                    c.classList.remove('d-none');
                }



            });





        }



    }
</script>