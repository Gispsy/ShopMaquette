import React from "react";
import axios from "axios";

export function FormulaireModification(props){

    //Constante du patch pour utilisation avec axios
    const [patchs, setPatchs] = React.useState("");

    const Modif = (id) => {
        axios.patch(`https://gispsy.amorce.org/api/produits/${id}`).then(() =>{


         
        })

    }

    return(

        <div className="container">
            <form className="mb-3 row mt-3">
                <label className="form-label" htmlFor="nom">Nom
                    <input className="form-control" type="text" alt="nom" id="nom" />
                </label>

                <label className="form-label mt-3" htmlFor="quantite">Quantite
                    <input className="form-control" type="number" alt="quantite" id="quantite" />
                </label>

                <label className="form-label mt-3" htmlFor="description">Descritption
                    <input className="form-control" type="textarea" alt="description" id="description" />
                </label>

                <label htmlFor="prix">Prix
                    <input className="form-control" type="text" alt="prix" id="prix" />
                </label>


                <button type="submit" className="btn btn-primary mt-3">Modifier</button>
            </form>


        </div>
    )
}