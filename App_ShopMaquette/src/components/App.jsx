import React from 'react'
import '../styles/App.css'
import Header from './partials/Header'
import { Produit } from './Produit'

function App() {

  return (
    <div className='container-fluid'>
      <Header />
      <Produit />
    </div>
  )
}

export default App
