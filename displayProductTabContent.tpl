 <h3 class="page-product-heading" id="mymod-contents-tab" >
     Comentarios del producto
    </h3>
    <div class="rte">
        {foreach from=$comments item=comment}
            <p>
            <strong> Comentario #{$comment.id_mymod_comment}:</strong>
            {$comment.comment}<br>
            <strong> Puntuacion:{$comment.grade}/5<br>
            </p><br>
        {/foreach}
    </div>
        <form action="" method="POST" id="comment-form">
            <div class="form-group">
                <label for="grade"> Puntuacion: </label>
                <div class="row">
                    <div class="col-xs-4">
                        <select id="grade" class="form-control" name="grade">
                            <option value="0"> --Elegir-- </option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <label for="comment">Comentario: </label>
            <textarea name="comment" id="comment"  class="form-control"/>
        </div>
            <div class="submit">
                <button type="submit" name="mymod_pc_submit_comment" class="button btn btn-default-button-default">
                <span>Mandar<i class="icon-chevron-rigth rigth"></i></span>
            </div>
        </form>
