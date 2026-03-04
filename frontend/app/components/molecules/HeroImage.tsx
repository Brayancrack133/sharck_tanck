// src/components/molecules/HeroImage.tsx
import React from 'react';
import './HeroImage.css';

const HeroImage: React.FC = () => {
  return (
    <div className="hero-container">
      <img className="hero-image" src="/logo_1_barber.png" alt="Banner principal" />
      <div className="hero-overlay">
        <p>Transformamos tu look, potenciamos tu confianza.</p>
        <button onClick={() => {
  document.getElementsByClassName('about-container')[0]?.scrollIntoView({ behavior: 'smooth' });
}}>Conoce a GlowUp</button>
      </div>
    </div>
  );
};

export default HeroImage;
