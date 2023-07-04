import React from "react";
import axios from "axios";


export function FormulaireAjout() {

    const [posts, setPosts] = React.useState([])

    //Sert a prendre les données et les afficher
    React.useEffect(() => {

        const baseURL = `https://gispsy.amorce.org/api/produits`;

        axios.post(baseURL).then((response) => {
            setPosts(response.data['hydra:member']);
        });
    }, []);


    return (

        <div className="container-fluid">
            <form>
                <label htmlFor="nom">Nom</label>
                <input type="text" alt="nom" />
                <label htmlFor="quantiter">Quantiter</label>
                <input type="text" alt="quantiter" />
                <label htmlFor="description">Descritption</label>
                <input type="text" alt="description" />
                <label htmlFor="prix">Prix</label>
                <input type="text" alt="prix" />


                <button className="btn btn-primary">Ajouter</button>
            </form>

        </div>

    )
}