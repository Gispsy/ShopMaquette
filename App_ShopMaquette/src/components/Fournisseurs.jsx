import React from "react";
import axios from "axios";

export function Fournisseurs() {
    const [post, setPost] = React.useState([])

    //Permet de lire dans la base de donée
    React.useEffect(() => {

        //baseURL contient l'url de l'api
        const baseURL = `http://127.0.0.1:8000/api/Fournisseurs`;

        axios.get(baseURL).then((response) =>{
            setPost(response.data)
        });
    }, [])

    //Si la valuer de post est null alors n'affiche rien
    if (!post) {
        return null

    }
    //Si post a un tableau remplis alors affiche tout
    return(
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>adresse</th>
                        <th>code postal</th>
                        <th>ville</th>
                        <th>pays</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                </tbody>
            </table>

        </div>
    )
}
//Export la function Fournisseurs pour l'utiliser ailleurs