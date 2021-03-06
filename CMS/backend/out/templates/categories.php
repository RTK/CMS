<?php

    require 'head.php';

    function getSize($size){
        if($size / 1024 > 1)
        {
            if($size/1024/1024>1)
            {
                return round($size/1024/1024,2).' MB';
            }
            return round($size/1024,2).' kB';
        }
        return $size.' B';
    }
?>


<h2>Kategorien</h2>
<section id="uploadPage">
<script>
    var u = new Layer ( {
        parent: document.getElementById('uploadPage'),
        class: 'cms-layer'
    }   );

    u.html( '<form action="?page=categories&newfile" id="uploadform" method="post" enctype="multipart/form-data"><input type="text" name="cmsdata#file" /></form>', 'Neue Kategorie erstellen');
    u.switchType(2, [ 'Erstellen', 'Abbrechen' ], [ function () {
       document.getElementById( 'uploadform' ).submit();
    }, null ]);

    var r = new Layer ( {
        parent: document.getElementById('uploadPage'),
        class: 'cms-layer'
    }   );

    r.html( '<form action="?page=categories&renamefile" id="renameform" method="post"><input type="hidden" name="renameid" id="renamehidden" /><input type="text" name="cmsdata#file" maxlength="256" pattern="^[_.a-zA-Z0-9]$/"></form>', 'Kategorie umbenennen');
    r.switchType(2, [ 'Umbenennen', 'Abbrechen' ], [ function () {
       document.getElementById( 'renameform' ).submit();
    }, null ]);

    var d = new Layer ( {
        parent: document.getElementById('uploadPage'),
        class: 'cms-layer'
    }   );

    d.html( '<form action="?page=categories&deletefiles" id="deleteform" method="post"></form> Sollen die Kategorien wirklich gelöscht werden?', 'Kategorien löschen');
    d.switchType(2, [ 'Kategorien Löschen', 'Abbrechen' ], [ function () {
       document.getElementById( 'deleteform' ).submit();
    }, null ]);

</script>
    <section>
        <menu>
            <nav class="cms-navigation">
                <?php if($this->userrights[1]) { ?><a href="javascript: u.show(); void(0)" tooltip tooltip-direction="bottom" tooltip-text="Eine neue Kategorie erstellen">
                    <figure class="cms-table-cell fa fa-file">
                        <figcaption class="cms-table-cell">Kategorie erstellen</figcaption>
                    </figure>
                </a><?php } ?>
                <?php if($this->userrights[3]) { ?><a class="cms-disabled" tooltip tooltip-direction="bottom" tooltip-text="Eine ausgewählte Kategorie umbenennen" id="rename">
                    <figure class="cms-table-cell fa fa-edit">
                        <figcaption>Kategorie umbenennen</figcaption>
                    </figure>
                </a><?php } ?>
                <?php if($this->userrights[2]) { ?><a class="cms-disabled" tooltip tooltip-direction="bottom" tooltip-text="Ausgewählte Kategorien löschen" id="delete">
                    <figure class="cms-table-cell fa fa-eraser">
                        <figcaption class="cms-table-cell">Ausgewählte Kategorien Löschen</figcaption>
                    </figure>
                </a><?php } ?>
            </nav>
        </menu>
    </section>
    <section>
        <table class="cms-table-styled cms-full" id="uploaderTable">
            <thead>
                <tr>
                    <th></th>
                    <th style="width: 100%;">Kategorie</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($this->data['categories'] as $f) {
                        print ( '<tr>' );
                            print ( '<td><input type="checkbox" name="checkbox" /><input type="hidden" data-id="'.$f['categoryID'].'"value="' . $f[ 'bezeichnung' ] . '" name="cmsfilesdata['.$f[ 'categoryID' ] .']"/></td>' );
                            print ( '<td>' . $f[ 'bezeichnung' ] . '</td>' );
                        print ( '</tr>');
                    }
                ?>
            </tbody>
        </table>
    </section>
</section>

<script>
    var c, q = document.getElementById('uploaderTable').querySelectorAll('input[type="checkbox"]');
    for(c = 0; c < q.length; c++)
    {
        q[c].addEventListener('change',function(){
            selectCheckbox(q,q.length,this);
        }, false);
    }

        function selectCheckbox(a,b,el) {
            var i, co = 0;

            for ( i = 0; i != b; i++ )
            {
                if(a[i].checked)
                    co++;

            }

            document.getElementById('delete').setAttribute('class','');
            document.getElementById('delete').href = 'javascript: d.show(); void(0);';

            document.getElementById('deleteform').innerHTML = '';

            for ( i = 0; i < b; i++ )
            {
                if ( co === 1 )
                {
                    if(a[i].checked)
                    {
                        document.getElementById('rename').setAttribute('class','');
                        document.getElementById('rename').href = 'javascript: r.show(); void(0);';

                        document.getElementById('renameform').querySelector('input[type="hidden"]').value = document.getElementById('uploaderTable').querySelectorAll('input[type="hidden"]')[i].getAttribute('data-id');
                        document.getElementById('renameform').querySelector('input[type="text"]').value = document.getElementById('uploaderTable').querySelectorAll('input[type="hidden"]')[i].value;
                    }
                }

                if ( co >= 1 )
                {

                    if(a[i].checked && document.getElementById('uploaderTable').querySelectorAll('input[type="hidden"]')[i])
                    {
                        document.getElementById('deleteform').appendChild(document.getElementById('uploaderTable').querySelectorAll('input[type="hidden"]')[i].cloneNode(true));
                    }

                }
            }

            if( co !== 1 )
            {

                document.getElementById('rename').setAttribute('class','cms-disabled');
                document.getElementById('rename').href = 'javascript: void(0);';
            }

            if ( co === 0)
            {
                document.getElementById('delete').setAttribute('class','cms-disabled');
                document.getElementById('delete').href = 'javascript: void(0);';
            }

        }
</script>
<?php

    require 'footer.php';

?>