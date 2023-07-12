import React from "react";
import { Categorie } from "../Categorie";
import { SousCategorie } from "../SousCategorie";
import { Produit } from "../Produit/Produit";
import { Fournisseurs } from "../Fournisseurs";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";

function Header() {


    return (
        <div className="container-fluid">
            <nav className="navbar navbar-expand-lg bg-primary">
                <ul>
                    <li className="navbar-brand">
                        <Link to="/Categorie">Categorie</Link>

                    </li>
                    <li className="navbar-brand">
                        <Link to="/SousCategorie">Sous-Categorie</Link>

                    </li>
                    <li className="navbar-brand">
                        <Link to="/produit">Produit</Link>

                    </li>
                    <li className="navbar-brand">
                        <Link to="/fournisseur">Fournisseurs</Link>

                    </li>

                </ul>

            </nav>
            <Routes>

                <Route path="/Categorie" element={<Categorie />} />
                <Route path="/SousCategorie" element={<SousCategorie />} />
                <Route path="/produit/*" element={<Produit />} />
                <Route path="/fournisseur" element={<Fournisseurs />} />
                
            </Routes>

        </div>
    )
}
export default Header