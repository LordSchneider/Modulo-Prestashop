{if $enable_grades eq 1 || $enable_comments eq 1}
  <h3 class="page-product-heading" id="mymodcomments-content-tab"{if isset($new_comment_posted)} data-scroll="true"{/if}>{l s='Comentarios del producto' mod='mymodcomments'}</h3>
    <div class="rte">
        <form action="" method="POST" id="comment-form">
        {if $enable_grades eq 1}
            {foreach from=$comments item=comment}
                <p>
                <strong> Comentario #{$comment.id_mymod_comment}:</strong>
                {$comment.comment}<br>
                <strong> Puntuacion:{$comment.grade}/5<br>
                </p><br>
            {/foreach}
            <div class="form-group">
                <label for="grade"> Puntuacion: </label>
                <div class="row">
                    <div class="col-xs-4">
                        <input id="grade" name="grade" value="0" type="number" class="rating" min="0" max"5" step="1" data-size="sm">
                    </div>
                </div>
            </div>
        {/if}
        {if $enable_comments eq 1}
            
            <div class="form-group">
                <label for="comment">Comentario: </label>
                <textarea  name="comment" id="comment" ></textarea>
            </div>
        {/if}
        <div class="submit">
                <button type="submit" name="mymod_pc_submit_comment" class="button btn btn-default-button-default">
                <span>Mandar<i class="icon-chevron-rigth rigth"></i></span>
            </div>
        </form>
     </div>
{/if}
