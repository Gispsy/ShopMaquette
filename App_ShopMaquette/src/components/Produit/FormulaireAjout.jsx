import React from "react";
import axios from "axios";


export function FormulaireAjout() {

    //Sert a faire le post d'un produti
    const [posts, setPosts] = React.useState([])
    //Sert a faire l'affichage des souscategories
    const [souscategories, setSouscategories] = React.useState([])
    //Sert a faire l'affichage des fournisseurs
    const [fournisseurs, setFournisseurs] = React.useState([])


    //Sert a faire selectionner les sous categorie
    const [souscategorie, setSouscategorie] = React.useState('')
    //Sert a faire l'affichage des fournisseurs
    const [fournisseur, setFournisseur] = React.useState('')

    //Sert a récupérer la liste de toute les souscatégories actuelle
    React.useEffect(() => {

        const UrlSouscategorie = `https://gispsy.amorce.org/api/sous_categories`;

        axios.get(UrlSouscategorie).then((response) => {
            setSouscategories(response.data['hydra:member'])
        })

    }, []);

    //Sert a récupérer la liste de tout les fournisseurs actuelle
    React.useEffect(() => {

        const UrlFournisseur = `https://gispsy.amorce.org/api/fournisseurs`;

        axios.get(UrlFournisseur).then((response) => {
            setFournisseurs(response.data['hydra:member'])
        })

    }, []);

    //Sert a récupérer les données pour l'ajout d'un produit

    const handleSubmit = async (event) => {
        event.preventDefault();

        const nom = event.currentTarget.elements.nom.value;
        const quantiter = parseInt(event.currentTarget.elements.quantite.value);
        const souscategorie = ["/api/sous_categories/" + event.currentTarget.elements.souscategorie.value];
        const fournisseur = "/api/fournisseurs/" + event.currentTarget.elements.fournisseur.value;
        const description = event.currentTarget.elements.description.value;
        const prixPHUT = event.currentTarget.elements.prix.value;
        const updateAt = "2023-07-05T14:41:13.859Z"


        const produitData = {
            nom,
            quantiter,
            souscategorie,
            fournisseur,
            description,
            prixPHUT,
            updateAt,
        };

        try {
            const response = await
            axios.post("https://gispsy.amorce.org/api/produits",
                produitData
            );

            console.log("Produit ajouté avec succès", response.data);
        } catch (error) {
            console.error("Erreur lors de l'ajout du produit", error);
        }
    };

    const handleSousCategorie = (e) => {
        e.preventDefault();
        setSouscategorie(e.target.value);
    };

    const handleFournisseur = (e) => {
        e.preventDefault();
        setFournisseur(e.target.value);
    };


    //Si la connexion a l'api n'est pas bon alors retour le text en dessous
    if (!posts) return "Pas de formulaire pour créer un produit"

    return (

        <div className="container-fluid">
            <form className="mb-3 row mt-3" onSubmit={handleSubmit}>
                <label className="form-label" htmlFor="nom">Nom
                    <input className="form-control" type="text" alt="nom" id="nom" />
                </label>
                <label className="form-label mt-3" htmlFor="quantite">Quantite
                    <input className="form-control" type="number" alt="quantite" id="quantite" />
                </label>

                {/* Select de toute les souscategorie disponible */}
                <select className="mt-3" onChange={handleSousCategorie} value={souscategorie} name="souscategorie" id="souscategorie">
                    <option value="Choix de la souscatégorie"> choix de la Sous-catégorie</option>

                    {souscategories.map((souscategorie) =>
                        <option key={souscategorie.id} value={souscategorie.id}>
                            {souscategorie.nom}
                        </option>
                    )}
                </select>

                {/* Select de tout les fournisseurs disponible */}
                <select className="mt-3" onChange={handleFournisseur} value={fournisseur} name="fournisseur" id="fournisseur">
                    <option value="Choix du fournisseur"> choix du Fournisseur</option>

                    {fournisseurs.map((fournisseur) =>
                        <option key={fournisseur.id} value= {fournisseur.id}>
                            {fournisseur.nom}
                        </option>
                    )}
                </select>

                <label className="form-label mt-3" htmlFor="description">Descritption
                    <input className="form-control" type="textarea" alt="description" id="description" />
                </label>
                <label htmlFor="prix">Prix
                    <input className="form-control" type="text" alt="prix" id="prix" />
                </label>


                <button type="submit" className="btn btn-primary mt-3">Ajouter</button>
            </form>

        </div>

    )
}