import React from "react";
import axios from "axios";
import { FormulaireAjout } from "./FormulaireAjout";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";

export function Produit() {

    const [gets, setGets] = React.useState([])

    //Sert a prendre les données et les afficher
    React.useEffect(() => {

        const baseURL = `https://gispsy.amorce.org/api/produits`;

        axios.get(baseURL).then((response) => {
            setGets(response.data['hydra:member']);
        });
    }, []);

    //Function de suppression d'un produit via son id
    const Suppression = (id) => {

        axios.delete(`https://gispsy.amorce.org/api/produits/${id}`).then(() => {
            alert("Produit supprimer avec succées");
        });
    }

    

    //Si pas de produit afficher la phrase en dessous
    if (!gets) return (
        <div>
            pas de produit actuellement dans le magasin

        </div>
    );

    return (
        <div className="container-fluid">
            <table className="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantiter</th>
                        <th scope="col">Description</th>
                        <th scope="col">fournisseur</th>
                        <th scope="col">Prix Phut</th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    {gets.map((getsProduit) =>
                        <tr key={getsProduit.id}>
                            <td>{getsProduit.nom}</td>
                            <td>{getsProduit.quantiter}</td>
                            <td>{getsProduit.description}</td>
                            <td>{getsProduit.fournisseur.nom}</td>
                            <td>{getsProduit.prixPHUT}</td>
                            <td>
                                <button className="btn btn-primary">
                                    Modifier
                                </button>
                            </td>
                            <td>
                                <button className="btn btn-primary" onClick={() => {Suppression(getsProduit.id)}}>
                                    Supprimer
                                </button>
                            </td>

                        </tr>
                    )}
                </tbody>
            </table>
            <button className="btn btn-primary col-12">
                <Link to="formulaire">Ajout</Link>

            </button>

            <Routes >
                <Route path="formulaire" element={<FormulaireAjout />} />

            </Routes>
        </div>
    )
}