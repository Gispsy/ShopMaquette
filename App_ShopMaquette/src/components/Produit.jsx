import React from "react";
import axios from "axios";
import { FormulaireAjout } from "./FormulaireAjout";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";

export function Produit() {

    const [posts, setPosts] = React.useState([])

    //Sert a prendre les données et les afficher
    React.useEffect(() => {

        const baseURL = `https://gispsy.amorce.org/api/produits`;

        axios.get(baseURL).then((response) => {
            setPosts(response.data['hydra:member']);
        });
    }, []);

    //Si pas de produit afficher la phrase en dessous
    if (!posts) return (
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
                    {posts.map((postProduit) =>
                        <tr key={postProduit.id}>
                            <td>{postProduit.nom}</td>
                            <td>{postProduit.quantiter}</td>
                            <td>{postProduit.description}</td>
                            <td>{postProduit.fournisseur.nom}</td>
                            <td>{postProduit.prixPHUT}</td>
                            <td>
                                <button className="btn btn-primary">
                                    Modifier
                                </button>
                            </td>
                            <td>
                                <button className="btn btn-primary">
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