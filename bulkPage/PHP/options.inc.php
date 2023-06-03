<h3>BulkPage Creator</h3>
<p class="text-muted">Create Many page fast as you can </p>

<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN_BASE; ?>bl-plugins/tinymce/css/tinymce_toolbar.css">
<script src="<?php echo DOMAIN_BASE; ?>bl-plugins/tinymce/tinymce/tinymce.min.js?version=5.10.5"></script>



<form method="POST">

    <select name="option" class="form-control mb-2">
        <option value="pages">Pages</option>
        <option value="categories">Categories</option>
    </select>

    <input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="<?php echo $tokenCSRF; ?>">

    <textarea class="form-control" name="list" placeholder="example1, example2, example3"></textarea>



    <?php

    $p = new Pages();

    echo '<div class="bg-light border  p-2 my-2">Pages on Bludit :' . count($p->db).'</div>';


    ?>

    <div class="ifpages bg-light border mt-2 p-3">

        <label>Parents</label>




        <select name="parents" class="form-control">

            <option value="">None</option>

            <?php foreach ($p->db as  $value) {



                echo '<option value="' .  $value['title'] . '">' . $value['title'] . '</option>';
            }; ?>

        </select>


        <?php

        $dbs = new Categories();




        ?>

        <br>
        <label>Categories</label>
        <select name="categories" class="form-control">

            <option value="">None</option>


            <?php foreach ($dbs->db as $cat) {


                echo '<option value="' . $cat['name'] . '">' . $cat['name'] . '</option>';
            }; ?>


        </select>


        <br>
        <label for="tags">Tags</label>
        <input type="text" class="form-control" name="tags">
        <br>
        <label for="tags">Type</label>

        <select name="type" class="form-control">
            <option value="published">published</option>
            <option value="static">static</option>
            <option value="draft">draft</option>
            <option value="sticky">sticky</option>
            <option value="scheduled">scheduled</option>
        </select>


        <br>
        <label for="content">Content</label>
        <textarea name="content" id="jseditor" class="form-control"></textarea>

    </div>

    <input type="submit" class="btn btn-primary mt-2">
</form>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="box-sizing:border-box;display:grid; width:100%;grid-template-columns:1fr auto; padding:10px;background:#fafafa;border:solid 1px #ddd;margin-top:20px;">
    <p style="margin:0;padding:0;"> If you like use my plugin! Buy me ☕ </p>
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="KFZ9MCBUKB7GL">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" border="0">
    <img alt="" src="https://www.paypal.com/en_PL/i/scr/pixel.gif" width="1" height="1" border="0">
</form>

<script>
    tinymce.init({
        selector: "#jseditor",
        auto_focus: "jseditor",
        element_format: "html",
        entity_encoding: "raw",
        skin: "oxide",
        schema: "html5",
        statusbar: false,
        menubar: false,
        branding: false,
        browser_spellcheck: true,
        pagebreak_separator: PAGE_BREAK,
        paste_as_text: true,
        remove_script_host: false,
        convert_urls: true,
        relative_urls: false,
        valid_elements: "*[*]",
        cache_suffix: "?version=5.10.5",

        plugins: ["code autolink image link pagebreak advlist lists textpattern table"],
        toolbar1: "formatselect bold italic forecolor backcolor removeformat | bullist numlist table | blockquote alignleft aligncenter alignright | link unlink pagebreak image code",
        toolbar2: "",
        language: "en",
        content_css: "/bludit/bl-plugins/tinymce/css/tinymce_content.css",
        codesample_languages: [],
    });


    if (document.querySelector('select[name="option"]').value !== 'pages') {

        document.querySelector('.ifpages').classList.add('d-none');
    } else {
        document.querySelector('.ifpages').classList.remove('d-none');
    }

    document.querySelector('select[name="option"]').addEventListener('click', (e) => {
        e.preventDefault();


        if (document.querySelector('select[name="option"]').value !== 'pages') {

            document.querySelector('.ifpages').classList.add('d-none');
        } else {
            document.querySelector('.ifpages').classList.remove('d-none');
        }

    });
</script>