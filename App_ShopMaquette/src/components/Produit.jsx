import React from "react";
import axios from "axios";

export function Produit() {

    const [posts, setPosts] = React.useState([])

    React.useEffect(() => {

        const baseURL = `https://gispsy.amorce.org/api/produits`;

        axios.get(baseURL).then((response) => {
            setPosts(response.data['hydra:member']);
        });
    }, []);

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
                        <th>Quantiter</th>
                        <th>Description</th>
                        <th>fournisseur</th>
                        <th>Prix Phut</th>
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

        </div>
    )
}