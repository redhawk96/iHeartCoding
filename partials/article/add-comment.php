<div class="contact-form-box" style="padding-top:50px">
    <div class="title-section">
        <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
    </div>

    <form id="comment-form" action="controllers/commentController.php" method="POST">
        <input name="p_id" type="hidden" value="0">
        <div class="row">
            <div class="col-md-6">
                <label for="name">Name</label>
                <input id="name" name="c_author" type="text" required>
            </div>
            <div class="col-md-6">
                <label for="mail">E-mail</label>
                <input id="mail" name="c_mail" type="text" required>
            </div>
        </div>
        <label for="comment">Comment</label>
        <textarea id="editor" name="c_content"></textarea>

        <button type="submit" id="submit-contact" name="add_comment" value="<?php echo $a_id ?>" style="margin-top:15px;">
            <i class="fa fa-comment"></i> Post Comment
        </button>
    </form>
</div>

<script>
    CKEDITOR.replace( 'editor', {
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'styles', items: [ 'Styles', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'ShowBlocks' ] },
        { name: 'others', items: [ '-' ] }
        ]
    });
</script>