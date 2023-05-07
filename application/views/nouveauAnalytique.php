<?php ?>
<main class="container mb-5">
    <div class="" style="margin-top: 50px">
    </div>
    <div class="shadow-lg p-5 rounded">
        <form methode="get" action="<?php echo site_url("SaisieC/addEcriture"); ?>">
            <table class="table">
                <tr class="table">
                    <th colspan="8" class="display-5" >Saisie Ecriture</th>
                </tr>
                <tr class="table">
                    <th colspan="2">jour</th>
                    <th colspan="2">libellé</th>
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
                    <th colspan="8" class="display-6">Mouvement</th>
                </tr>
                <tr class="table">
                    <th>N°</th>
                    <th>compte</th>
                    <th>tiers</th>
                    <th>crédit</th>
                    <th>débit</th>
                    <th>valeur</th>
                    <th>taux</th>
                    <th>devise</th>
                    <th></th>
                </tr>
                <tbody id="demo" >
                </tbody>
                <tr class="table">
                    <th colspan="4">N°</th>
                    <th colspan="2">Pourcentage</th>
                    <th colspan="2">Intitulé</th>
                </tr>
                <tbody id="underdemo"></tbody>
                <tr class="table">
                    <th colspan="4">total débit</th>
                    <th colspan="4">total crédit</th>
                </tr>
                <tbody id="total">

                </tbody>
            </table>
            <div id="isany"></div>
            <div id="underisany"></div>
            <input type="hidden" name="idExercice" value="<?php //echo $idExercice[0]; ?>">
            <input type="hidden" name="idCode" value="<?php //echo $idCode[0]; ?>">
            <input type="hidden" name="mois" value="<?php //echo $mois[0]; ?>">
            <input type="hidden" name="annee" value="<?php //echo $annee[0]; ?>">
            <input type="hidden" name="values" id="values" />
            <div class="my-3">
                <button type="submit" class="btn btn-success me-2">Valider</button>
                <button type="button" class="btn btn-success me-2" onclick="ajoutMouvement()">Ajouter</button>
                <!--<button type="button" class="btn btn-success me-2" onclick="equilibrer()">Equilibrer</button>-->
            </div>
        </form>
    </div>
</main>

<datalist id="browser">
    <?php //foreach($listeCompte as $row){?>
    <option value="<?php //echo $row['numero'];?>">
        <?php //} ?>
</datalist>
<datalist id="devise">
    <?php //foreach($listeDevise as $row){?>
    <option value="<?php //echo $row['nomdevise'];?>">
        <?php //} ?>
</datalist>
<datalist id="tiers">
    <?php //foreach($tiers as $row){?>
    <option value="<?php //echo $row['intitulecompte'];?>">
        <?php //} ?>
</datalist>
<script>
    var i = 0;
    var j = 0;
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
    function generateInput(y, compte,tiers,credit,debit,taux,valeur,devise){
        return "<tr class='table'>" +
            "<td><p name='numero"+y+"' id='numero"+y+"'>"+ y +"</p></td>" +
            "<td><input list='browser' type='text' class='form-control' name='compte"+y+"' id='compte"+y+"' placeholder='compte' value='"+compte+"' /></td>" +
            "<td><input list='tiers' type='text' class='form-control' name='tiers"+y+"' id='tiers"+y+"'placeholder='tiers' value='"+tiers+"'/></td>" +
            "<td><input type='number' class='form-control' name='credit"+y+"' id='credit"+y+"' placeholder='credit' class='form-control' value='"+credit+"' onfocus='calculeDevise("+y+",true)'/></td>" +
            "<td><input type='number' name='debit"+y+"' id='debit"+y+"'placeholder='debit' class='form-control' value='"+debit+"' onfocus='calculeDevise("+y+",false)'/></td>" +
            "<td><input type='number' name='valeur"+y+"' id='valeur"+y+"' placeholder='valeur' class='form-control' value='"+valeur+"'></td>" +
            "<td><input type='number' class='form-control' name='taux"+y+"' id='taux"+y+"' placeholder='En Ariary' value='"+taux+"'></td>" +
            "<td><input list='devise' class='form-control' name='devise' id='devise"+y+"' placeholder='devise' value='"+devise+"'></td>" +
            "<td><button type='button' class='btn' style='background-color:green;' onclick='ajoutUnderMouvement()' >+</button></td>" +
            "<td><button type='button' class='btn' style='background-color:red;' onclick='effacer("+y+")' >x</button></td></tr>";
    }
    function generateUnderInput(x, pourcent, nom) {
        return "<tr class='table'>" +
            "<td colspan='4'><p name='numero"+x+"' id='numero"+x+"'>"+ x +"</p></td>" +
            "<td colspan='2'><input type='number' class='form-control' name='pourcent"+x+"' id='pourcent"+x+"' placeholder='pourcent' value='"+pourcent+"'></td>" +
            "<td colspan='2'><input type='text' class='form-control' name='nom"+x+"' id='nom"+x+"' placeholder='nom' value='"+nom+"'></td>" +
            "<td><button type='button' class='btn' style='background-color:red;' onclick='effacerunder("+x+")' >x</button></td></tr></tr>";
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
    function equilibrer() {
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

        a = getValues()+ text +"</br>";
        var total = "<tr><td  colspan='4'>"+credits+"</td><td  colspan='4'>"+debits+"</td></tr>";
        document.getElementById("demo").innerHTML=a;
        document.getElementById("isany").innerHTML=isany;
        document.getElementById("total").innerHTML=total;
    }
    function ajoutUnderMouvement() {
        j = j + 1;
        var text = generateUnderInput(j,'','');
        var isany = "<input type='hidden' name='nombre' value='"+j+"'>";

        a = getUnderValues()+ text +"</br>";
        //var total = "<tr><td  colspan='4'>"+credits+"</td><td  colspan='4'>"+debits+"</td></tr>";
        document.getElementById("underdemo").innerHTML=a;
        document.getElementById("underisany").innerHTML=isany;
        //document.getElementById("total").innerHTML=total;
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
    function getUnderValues() {
        var av = "";
        var e = 1;
        //debits = 0;
        //credits = 0;
        if(j > 1){
            for(e = 1 ; e < j ; e++){
                var pourcent = document.getElementById("pourcent"+e).value;
                var nom = document.getElementById("nom"+e).value;
                av = av + generateUnderInput(e,pourcent,nom);
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
    function effacerunder(t) {
        var av = "";
        var e = 1;
        var a = 1;
        debits = 0;
        credits = 0;
        if(j > 1){
            for(a = 1 ; a <= j ; a++){
                if(a != t){
                    var pourcent = document.getElementById("pourcent"+a).value;
                    var nom = document.getElementById("nom"+a).value;
                    av = av + generateUnderInput(e,pourcent,nom);
                    e = e + 1;
                }
            }
        }
        j = j - 1;
        var total = "<tr><td  colspan='4'>"+credits+"</td><td  colspan='4'>"+debits+"</td></tr>";
        var isany = "<input type='hidden' name='nombre' value='"+j+"'>";
        // var b = document.getElementById("demo").innerHTML;
        document.getElementById("underdemo").innerHTML=av;
        document.getElementById("underisany").innerHTML=isany;
        //document.getElementById("total").innerHTML=total;
    }

</script>
