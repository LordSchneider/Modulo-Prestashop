    {if isset($css_files)}
        {foreach from=$css_files key=css_uri item=media}
            <link rel="stylesheet" href="{$css_uri}" type="text/css" media=""{$media}"/>
        {/foreach}
    {/if}
    {if isset($confirmation) }
        <div class="alert alert-success">GUARDADO</div>
    {/if}                            
<fieldset>
    <h1>Configuracion de mi coso</h1>
    <div class="panel">
        <div class="panel-heading">
            <legend>
                <img src="https://www.awesomelyluvvie.com/wp-content/uploads/2015/06/Welp-dog-blank.jpg" alt="" width="16"/>
                Configuracion
            </legend>
        </div>
        <form action="" method="post">
            <div class="form-group clearfix">
                <label class="col-lg-3"> Enable Grades: </label>
                <div class="col-lg-9">
                    <img src="" />
                    <input type="radio" id="enable_grades_1" name="enable_grades" value="1"{if $enable_grades eq '1'}checked{/if} />
                    <label class="t" for="enable_grades_1">SI</label>
                    <img src="" />
                    <input type="radio" id="enable_grades_0" name="enable_grades" value="0"{if $enable_grades eq '0'}checked{/if} />
                    <label class="t" for="enable_grades_0">NO</label>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-3">Enable comments: </label>
                <div class="col-lg-9">
                    <img src="">
                    <input type="radio" id="enable_comments_1" name="enable_comments" value="1"{if $enable_comments eq '1'}checked{/if}/>
                    <label class="t" for="enable_comments_1">SI</label>
                    <img src="">
                    <input type="radio" id="enable_comments_0" name="enable_comments" value="0"{if $enable_comments eq '0'}checked{/if}/>
                    <label class="t" for="enable_comments_0">NO</label>
                </div>
            </div>
            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit" name="my_form" value="GUARDAR" />
            </div>
        </form>
    </div>
</fieldset>
