 <script>
     if (document.querySelector('#static') != null) {


         document.querySelector('.nav-tabs').insertAdjacentHTML('afterend', '<input type="text" class="form-control searchBulk mt-2" placeholder="search" value="<?php

                                                                                                                                                                    if (isset($_GET['search'])) {
                                                                                                                                                                        echo $_GET['search'];
                                                                                                                                                                    };; ?>" onkeyup="check()">');


         function check() {

             const val = document.querySelector('.searchBulk').value.toLowerCase();

             document.querySelectorAll('tbody tr').forEach(c => {
                 c.classList.add('d-none');

                 const td = c.querySelector('a').innerHTML.toLowerCase();
                 const url = c.querySelector('.d-lg-table-cell a').innerHTML.toLowerCase();


                 if (td.includes(val) || url.includes(val)) {
                     c.classList.remove('d-none');
                 } else if (val == '') {
                     c.classList.remove('d-none');
                 }



             });

         };


         const val = document.querySelector('.searchBulk').value.toLowerCase();

         document.querySelectorAll('tbody tr').forEach(c => {
             c.classList.add('d-none');

             const td = c.querySelector('a').innerHTML.toLowerCase();
             const url = c.querySelector('.d-lg-table-cell a').innerHTML.toLowerCase();


             if (td.includes(val) || url.includes(val)) {
                 c.classList.remove('d-none');
             } else if (val == '') {
                 c.classList.remove('d-none');
             }



         });




         document.querySelectorAll('.pagination a').forEach(c => {

             c.addEventListener('click', () => {

                 const link = c.getAttribute('href');
                 const newLink = link + '&search=' + document.querySelector('.searchBulk').value;
                 c.setAttribute('href', newLink);

             })

         });


     }
 </script>