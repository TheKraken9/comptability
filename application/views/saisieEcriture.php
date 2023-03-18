
<style>
  .navbar.second-navbar {
        margin-top: 60px;
        background:  #0F243D !important;
        transition: all .5s ease-in-out;
    }
    .navbar.tiers-navbar {
        margin-top: 3px;
        background:  #0F243D !important;
        transition: all .5s ease-in-out;
    }

    .navbar.second-navbar.top-nav-collapse {
        margin-top: 45px;
    }
</style>
<nav id="navbar-example2" class="navbar top second-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style: italic"><?php echo $exercice[0]['nomexercice'];?></p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link text-white" href="#" ><?php echo $exercice[0]['debut'];?> a <?php echo $exercice[0]['fin'];?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">code journale</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Grande Livre</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">balance</a>
    </li>
    </ul>
</nav>
<nav id="navbar-example2" class="navbar top tiers-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-7 text-white" >Journale <?php echo $journale[0]['nom']?></br><?php echo  $mois[0]; ?>-<?php echo  $annee[0]; ?></p></a>
    <ul class="nav nav-pills">
    </ul>
</nav>
<main class="container">
  <div class="bg-light p-5 rounded">
    <form methode="get" action="<?php echo site_url("SaisieC/addEcriture"); ?>">
        <table class="table">
                <tr class="table">
                    <th colspan="8" class="display-5" >Saisie Ecriture</th>
                </tr>
                <tr class="table">
                    <th colspan="2">jour</th>
                    <th colspan="2">libelle</th>
                    <th colspan="2">ref-piece</th>
                    <th colspan="2"></th>
                </tr class="table">
                <tr class="table">
                    <td colspan="2"><input type="number" class="form-control" name="jour" placeholder="jour"></td>
                    <td colspan="2"><input type="text" class="form-control" name="libelle" placeholder="libelle"></td>
                    <td colspan="2"><input  type="text" class="form-control" name="ref" placeholder="ref_piece"></td>
                    <td colspan="2"></td>
                </tr>
                <tr class="table">
                    <th colspan="8" class="display-6">mouvement</th>
                </tr>
                <tr class="table">
                    <th>compte</th>
                    <th>tiers</th>
                    <th>credit</th>
                    <th>debit</th>
                    <th>valeur</th>
                    <th>taux</th>
                    <th>devise</th>
                    <th></th>
                </tr>
                <tbody id="demo" >
                     <!---  <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>
                       <td><input type="number" class="form-control" name="compte" id=""></td>-->
                </tbody>
                <tr class="table">
                    <th colspan="4">total debit</th>
                    <th colspan="4">total credit</th>
                </tr>
                <tbody id="total">

                </tbody>
            </table>
            <div id="isany"></div>
                    <input type="hidden" name="idExercice" value="<?php echo $idExercice[0]; ?>">
                    <input type="hidden" name="idCode" value="<?php echo $idCode[0]; ?>">
                    <input type="hidden" name="mois" value="<?php echo $mois[0]; ?>">
                    <input type="hidden" name="annee" value="<?php echo $annee[0]; ?>">
                    <input type="hidden" name="values" id="values" />  
                <div class="my-3">
                    <button type="submit" class="btn btn-success me-2">valider</button>
                    <button type="button" class="btn btn-success me-2" onclick="ajoutMouvement()">ajouter</button>
                    <button type="button" class="btn btn-success me-2" onclick="equilibrer()">equilibrer</button>
                </div>                                
    </form>
  </div>
</main>

    <datalist id="browser">
        <?php foreach($listeCompte as $row){?>
            <option value="<?php echo $row['numero'];?>">
        <?php } ?>
    </datalist>
    <datalist id="devise">
        <?php foreach($listeDevise as $row){?>
            <option value="<?php echo $row['nomdevise'];?>">
        <?php } ?>
    </datalist>                          
        <script>
            var i = 0;
            var a = "";
            var debit=0;
            var credit = 0;
        function deviseOption(indice){
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("option"+indice).innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo site_url("SaisieC/devise");?>", true);
            xhttp.send();
        }
        function generateInput(y,compte,tiers,credit,debit,taux,valeur,devise){
            return "<tr class='table'><td><input list='browser' type='text' class='form-control' name='compte"+y+"' id='compte"+y+"' placeholder='compte' value='"+compte+"' /></td><td><input type='text' class='form-control' name='tiers"+y+"' id='tiers"+y+"'placeholder='tiers' value='"+tiers+"'/></td><td> <input type='number' class='form-control' name='credit"+y+"' id='credit"+y+"' placeholder='credit' class='form-control' value='"+credit+"' onfocus='calculeDevise("+y+",true)'/></td><td><input type='number' name='debit"+y+"' id='debit"+y+"'placeholder='debit' class='form-control' value='"+debit+"' onfocus='calculeDevise("+y+",false)'/></td><td><input type='number' name='valeur"+y+"' id='valeur"+y+"' placeholder='valeur' class='form-control' value='"+valeur+"'></td><td><input type='number' class='form-control' name='taux"+y+"' id='taux"+y+"' placeholder='En Ariary' value='"+taux+"'></td><td><input list='devise' class='form-control' name='devise' id='devise"+y+"' placeholder='devise' value='"+devise+"'></td><td><button type='button' class='btn' style='background-color:red;' onclick='effacer("+y+")' >X</button></td></tr>";
        }
        function calculeDevise(y,boolcredit){
            var taux = document.getElementById("taux"+y).value;
            var valeur = document.getElementById("valeur"+y).value; 
            var val = 0;
            var rep= "";
            var e = 0;
            var av = "";
            debits = 0;
            credits = 0;
            for(e = 1 ; e <= i ; e++){
                var compte = document.getElementById("compte"+e).value;
                var tiers = document.getElementById("tiers"+e).value;
                var credit = document.getElementById("credit"+e).value;
                var debit = document.getElementById("debit"+e).value;
                var tauxu = document.getElementById("taux"+e).value;
                var valeuru = document.getElementById("valeur"+e).value;
                var devises = document.getElementById("devise"+e).value;
                if(e==y){
                    rep = generateInput(y,compte,tiers,credit,debit,tauxu,valeuru,devises);
                    if(taux != '' && valeur != ''){
                        val = parseInt(taux) * parseInt(valeur);
                        if(boolcredit == true){
                            rep = generateInput(y,compte,tiers,val,'',tauxu,valeuru,devises);
                            credits = credits + val;
                        }else{
                            rep = generateInput(y,compte,tiers,'',val,tauxu,valeuru,devises);
                            debits = debits + val;
                        }
                    }
                    av = av + rep;
                }else{
                    av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                }
                if(credit != ''){
                        credits = credits + parseInt(credit); 
                }
                if(debit != ''){
                    debits = debits + parseInt(debit); 
                }
            }
            var isany = "<input type='hidden' name='nombre' value='"+i+"'>";
            var total = "<tr><td colspan='4'>"+credits+"</td><td colspan='4'>"+debits+"</td></tr>";
            document.getElementById("demo").innerHTML=av;
            document.getElementById("isany").innerHTML=isany;
            document.getElementById("total").innerHTML=total;
            
        }
        function equilibrer(){
            var e= 1;
            var cred = 0;
            var deb = 0;
            var tcred = 0;
            var tdeb = 0;
            var av = "";
            var diff = 0;
            if(i >= 1){
                for(e = 1 ; e <= i ; e++){
                    var credit = document.getElementById("credit"+e).value;
                    var debit = document.getElementById("debit"+e).value;
                    //av = av + "<input list='browser' type='text' name='compte"+e+"' id='compte"+e+"' placeholder='compte' value='"+compte+"' /><input type='text' name='tiers"+e+"' id='tiers"+e+"'placeholder='tiers' value='"+tiers+"'/> <input type='number' name='credit"+e+"' id='credit"+e+"' placeholder='credit' value='"+credit+"'/><input type='number' name='debit"+e+"' id='debit"+e+"'placeholder='debit' value='"+debit+"'/><button type='button' onclick='effacer("+e+")' >X</button></br>";
                    if(credit != ''){
                        tcred = tcred + parseInt(credit);
                        cred = cred+1;
                    }
                    if(debit != ''){
                        tdeb =  tdeb + parseInt(debit);
                        deb = deb + 1;
                    }
                }
                if(tdeb > tcred){
                    if(cred == 1){
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(credit !=''){
                                var vt = tdeb/parseInt(tauxu);
                                av = av + generateInput(e,compte,tiers,tdeb,debit,tauxu,vt,devises);
                            }
                            if(debit !=''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                            if(debit =='' && credit == ''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                    
                        }
                    }else if(cred == 0){
                        var tc = 0;
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(debit =='' && credit == ''){
                                if(tc == 0){
                                    var vt = tdeb/parseInt(tauxu);
                                    av = av + generateInput(e,compte,tiers,tdeb,debit,tauxu,vt,devises);
                                }else{
                                    av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                                }
                            }else{
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                        }
                        if(tc == 0){
                            
                        }
                    }else{
                        diff = tdeb - tcred;
                        var moy = diff/cred;
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(credit !=''){
                                var cref = moy + parseInt(credit);
                                var vt = cref/parseInt(tauxu);
                                av = av + generateInput(e,compte,tiers,cref,debit,tauxu,vt,devises);
                            }
                            if(debit !=''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                            if(debit =='' && credit == ''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                        }
                    }
                }
                else if(tdeb < tcred){
                    if(deb == 1){
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(debit !=''){
                                var vt = tcred/parseInt(tauxu);
                                av = av + generateInput(e,compte,tiers,credit,tcred,tauxu,vt,devises);
                            }
                            if(credit !=''){
                                
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                            if(debit =='' && credit == ''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                        }
                    }else if(deb == 0){
                        var t = 0;
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(debit =='' && credit == ''){
                                if(t == 0){
                                    var vt = tcred/parseInt(tauxu);
                                    av = av + generateInput(e,compte,tiers,credit,tcred,tauxu,vt,devises);
                                }else{
                                    av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                                }
                            }else{
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                        }
                        if(t == 0){
                            
                        }
                    }
                    else{
                        diff = tcred - tdeb;
                        var moye = diff/deb;
                        for(e = 1 ; e <= i ; e++){
                            var compte = document.getElementById("compte"+e).value;
                            var tiers = document.getElementById("tiers"+e).value;
                            var credit = document.getElementById("credit"+e).value;
                            var debit = document.getElementById("debit"+e).value;
                            var tauxu = document.getElementById("taux"+e).value;
                            var valeuru = document.getElementById("valeur"+e).value;
                            var devises = document.getElementById("devise"+e).value;
                            if(debit !=''){
                                var def = moye + parseInt(debit);
                                var vt = def/parseInt(tauxu);
                                av = av + generateInput(e,compte,tiers,credit,def,tauxu,def,devises);
                            }
                            if(credit !=''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                            if(debit =='' && credit == ''){
                                av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                            }
                        }
                    }
                }else{
                av = getValues(); 
                }
            }
            var isany = "<input type='hidden' name='nombre' value='"+i+"'>";
            var total = "";
            if(tcred < tdeb){
                total = "<tr><td colspan='4'>"+tdeb+"</td><td  colspan='4'>"+tdeb+"</td></tr>";
            }else if(tdeb < tcred){
                total = "<tr><td  colspan='4'>"+tcred+"</td><td  colspan='4'>"+tcred+"</td></tr>";
            }
            else{
                total = "<tr><td  colspan='4'>"+tdeb+"</td><td  colspan='4'>"+tdeb+"</td></tr>";
            }
            document.getElementById("demo").innerHTML=av;
            document.getElementById("isany").innerHTML=isany;
            document.getElementById("total").innerHTML=total;
        }
        function ajoutMouvement() {
            i = i + 1;
            var text = generateInput(i,'','','','','','','');
            var isany = "<input type='hidden' name='nombre' value='"+i+"'>";
        
            a = getValues()+ text+"</br>";
            var total = "<tr><td  colspan='4'>"+credits+"</td><td  colspan='4'>"+debits+"</td></tr>";
            document.getElementById("demo").innerHTML=a;
            document.getElementById("isany").innerHTML=isany;
            document.getElementById("total").innerHTML=total;
        }
        function getValues(){
            var av = "";
            var e = 1;
            debits = 0;
            credits = 0;
            if(i > 1){
                for(e = 1 ; e < i ; e++){
                    var compte = document.getElementById("compte"+e).value;
                    var tiers = document.getElementById("tiers"+e).value;
                    var credit = document.getElementById("credit"+e).value;
                    var debit = document.getElementById("debit"+e).value;
                    var tauxu = document.getElementById("taux"+e).value;
                    var valeuru = document.getElementById("valeur"+e).value;
                    var devises = document.getElementById("devise"+e).value;
                    av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                    if(credit != ''){
                        credits = credits + parseInt(credit); 
                    }
                    if(debit != ''){
                        debits = debits + parseInt(debit); 
                    }
                }
            }
            return av;
        }
        function effacer(t){
            var av = "";
            var e = 1;
            var a = 1;
            debits = 0;
            credits = 0;
            if(i > 1){
                for(a = 1 ; a <= i ; a++){
                    if(a != t){
                        var compte = document.getElementById("compte"+a).value;
                        var tiers = document.getElementById("tiers"+a).value;
                        var credit = document.getElementById("credit"+a).value;
                        var debit = document.getElementById("debit"+a).value;
                        var tauxu = document.getElementById("taux"+e).value;
                        var valeuru = document.getElementById("valeur"+e).value;
                        var devises = document.getElementById("devise"+e).value;
                        av = av + generateInput(e,compte,tiers,credit,debit,tauxu,valeuru,devises);
                        e = e + 1;
                        if(credit != ''){
                        credits = credits + parseInt(credit); 
                        }
                        if(debit != ''){
                            debits = debits + parseInt(debit);  
                        }
                    }
                
                }
            }
            i = i -1;
            var total = "<tr><td  colspan='4'>"+credits+"</td><td  colspan='4'>"+debits+"</td></tr>";
            var isany = "<input type='hidden' name='nombre' value='"+i+"'>";
        // var b = document.getElementById("demo").innerHTML;
            document.getElementById("demo").innerHTML=av;
            document.getElementById("isany").innerHTML=isany;
            document.getElementById("total").innerHTML=total;
        }
    
    </script>
    </body>
    </html>