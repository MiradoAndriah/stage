<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            margin: 10mm auto;
            background: white;
            padding: 25mm 20mm 30mm 20mm;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .date-container {
            text-align: right;
            margin-bottom: 30px;
            font-size: 14pt;
        }
        #dateAffichee {
            display: inline-block;
            min-width: 220px;
            border-bottom: 1px solid #ccc; /* visible seulement à l'écran */
            padding: 2px 4px;
        }
        .facture-num {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 35px;
            letter-spacing: 1px;
        }
        .emetteur {
            text-align: center;
            line-height: 1.6;
            font-size: 14pt;
            margin-bottom: 40px;
        }
        .objet {
            font-weight: bold;
            font-size: 14pt;
            margin-bottom: 25px;
            text-align: left;
        }
        .objet input {
            border: none;
            border-bottom: 1px solid #ccc;
            background: transparent;
            font-weight: bold;
            font-size: 14pt;
            width: 120px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            font-size: 14pt;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px 12px;
        }
        th {
            background-color: #f0f0f0;
            text-align: left;
        }
        .amount {
            text-align: right;
            width: 30%;
        }
        .total {
            font-weight: bold;
        }
        .montant-lettres {
            text-align: center;
            font-style: italic;
            margin: 30px 0 20px;
            font-size: 14pt;
        }
        .echeance {
            font-weight: bold;
            margin: 20px 0;
            font-size: 13pt;
        }
        .reference {
            font-style: italic;
            margin: 15px 0 50px;
            font-size: 12pt;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
        }
        .signature {
            width: 45%;
            text-align: center;
            font-size: 13pt;
        }
        .signature-img {
            height: 60px;
            margin-bottom: 10px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 60"><path d="M10,40 Q50,10 90,40 T170,40" stroke="black" stroke-width="3" fill="none"/><path d="M30,40 Q70,20 110,40 T190,40" stroke="black" stroke-width="2" fill="none"/></svg>') no-repeat center;
            background-size: contain;
        }
        .controls {
            text-align: center;
            margin: 20px 0;
        }
        button {
            padding: 10px 20px;
            font-size: 16pt;
            background: #0066cc;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
 .montant-lettres {
    text-align: center;
    font-style: italic;
    font-size: 9pt;
    margin: 30px 0 20px;
    display: flex;                
    justify-content: center;      
    align-items: baseline;        
    flex-wrap: nowrap;            
    gap: 8px;                     
} 

.montant-lettres input {
    border: none;
    border-bottom: 1px solid #ccc;     /* soulignement discret à l'écran seulement */
    background: transparent;
    font-style: italic;
    font-size: 12pt;
    
    width: 500px;
    max-width: 70%;
    padding: 4px 0;
}

.montant-lettres input:focus {
    outline: none;
    border-bottom: 2px solid #0066cc;
}

        /* === Tout disparaît à l’impression === */
        @media print {
            body { background: white; }
            .page {
                margin: 0;
                padding: 25mm 20mm 30mm 20mm;
                box-shadow: none;
                width: 100%;
                min-height: 297mm;
            }
            .controls, #inputDate { display: none; }
            #dateAffichee, .objet input {
                border: none !important;
                border-bottom: none !important;
                background: transparent !important;
                padding: 0 !important;
            }
            @page { size: A4; margin: 0; }
            .montant-lettres {
        display: block;                    /* revient à un affichage normal */
        text-align: center;
    }
        .montant-lettres input {
        border: none !important;
        border-bottom: none !important;
        background: transparent !important;
        padding: 0 !important;
        margin: auto !important;}
        }
    </style>
</head>
<body>
    <div class="controls">
        <button onclick="window.print()">Imprimer / Enregistrer en PDF</button>
    </div>

    <div class="page">
        <!-- DATE MODIFIABLE AVEC CALENDRIER -->
        <div class="date-container">
            Antananarivo, le <span id="dateAffichee">05 janvier 2026</span>
            <input type="date" id="inputDate" style="margin-left:10px;">
        </div>

        <div class="facture-num"> {{ $show->numero_facture }}</div>

        <div class="emetteur">
            {{$locataire->nom}}<br>
            NIF: {{ $locataire->nif ?? '-'}} <br>
            STAT: {{$locataire->stat ?? '-'}}<br>
            {{ $locataire->adresse ?? '-' }} <br>
            Tana
        </div>

        <!-- OBJET MODIFIABLE (étage + bâtiment) -->
        <div class="objet">
            Objet : Location Appartement au 
            <input type="text" value="" placeholder="étage">, 
            batiment 
            <input type="text" value="" placeholder="bâtiment">, 
            Immeuble NY HAVANA 67 ha ANTANANARIVO
        </div>

        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th class="amount">En Ariary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Loyer Octobre 2024</td>
                    <td class="amount">{{ $show->loyer }}</td>
                </tr>
                <tr>
                    <td>Charges communes</td>
                    <td class="amount">{{ $show->charge_commune }}</td>
                </tr>
                <tr>
                    <td>TVA 20%</td>
                    <td class="amount">{{ $show->tva }}</td>
                </tr>
                <tr class="total">
                    <td><strong>Total</strong></td>
                    <td class="amount"><strong>{{ $show->total }}</strong></td>
                </tr>
            </tbody>
        </table>

       <div class="montant-lettres">
    Arrêté la présente à la somme de : 
    <input type="text" 
           id="montantLettres" 
           value="" 
           placeholder="Ex: CENT TRENTE-CINQ MILLE ARIARY">
</div>

        <div class="montant-lettres">
            Echéance de paiement : <input type="text" placeholder="EX: avant le 15 du mois en cours">
        </div>

        <div class="reference">
            (Virement au compte de la CMAR HY HAVANA logé chez la BFP, SG 67Ha N°00000 00004 2100008762 54)
        </div>

        <div class="signatures">
            <div class="signature">
                
                <div class="nom">Michael Jordan SAFIDITSIAVA</div>
                <div class="poste">Département Immobilisations</div>
            </div>
            <div class="signature">
               
                <div class="nom">Baby RAZAFINDRALAMBO</div>
                <div class="poste">Département Immobilisations</div>
            </div>
        </div>
    </div>

    <!-- SCRIPT POUR FORMATER LA DATE EN FRANÇAIS -->
    <script>
        const mois = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];

        function formaterDate(dateStr) {
            const d = new Date(dateStr);
            return `${d.getDate()} ${mois[d.getMonth()]} ${d.getFullYear()}`;
        }

        // Date par défaut (aujourd’hui ou celle que tu veux)
        const aujourdHui = new Date();
        document.getElementById('inputDate').valueAsDate = aujourdHui;
        document.getElementById('dateAffichee').textContent = formaterDate(aujourdHui);

        // Mise à jour quand on change la date
        document.getElementById('inputDate').addEventListener('change', function() {
            if (this.value) {
                document.getElementById('dateAffichee').textContent = formaterDate(this.value);
            }
        });
    </script>
</body>
</html>