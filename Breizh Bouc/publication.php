

<article class="border shadow bg-blue rounded px-3 mt-4">
    <div class="row align-items-center">
        <div class="col-1 text-center">
            <img src="<?=$profil_picture?>" width="40px" height="40px" alt="logo insert image">
        </div>
        <div class="col text-start">
            <h6 class="font-color"><?=$username?></h6>
        </div>
    </div>
   <div class="row bg-white">
        <p class="col p-3 mx-2 text-start"><?=$texte?></p>
    </div>
<p><?=$pid?></p>
    <div class="row">
        <form method="post" class="col d-flex justify-content-around">
            
        <div>
            <button type="submit" name="reaction" value="aime" class="btn btn-sm fs-3" alt="J'aime" title="J'aime">👍</button>(<?=$aime?>)
        </div>
        <div>
            <button type="submit" name="reaction" value="unlike" class="btn btn-sm fs-3" alt="Je n'aime pas" title="Je n'aime pas">👎</button>(<?=$unlike?>)
        </div>
        <div>
            <button type="submit" name="reaction" value="fuck" class="btn btn-sm fs-3" alt="J'emmerde" title="J'emmerde">🖕</button>(<?=$non?>)
        </div>
            <!-- <button class="btn btn-sm fs-6" alt="Je commente">commenter</button> -->
<input type="hidden" name="pid" value="<?=$pid?>">


        </form>
    </div>
</article>
