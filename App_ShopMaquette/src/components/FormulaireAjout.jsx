import React from "react";
import axios from "axios";


export function FormulaireAjout() {




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