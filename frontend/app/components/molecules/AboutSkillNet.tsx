// src/components/molecules/AboutSmartCut.tsx
import React from 'react';
import './AboutSkillNet.css';

const AboutSmartCut: React.FC = () => {
  return (
    <section id="about-container" className="about-container">
      <div className="about-inner">
        {/* Columna izquierda: texto y footer */}
        <div className="about-text-column">
          <h2>¿Quiénes somos?</h2>
          <p>
            Somos una plataforma digital enfocada en modernizar la forma en que las 
            personas reservan servicios en barberías y salones de belleza. Nuestro 
            objetivo es optimizar la administración de citas y mejorar la experiencia del 
            cliente mediante el uso de tecnología intuitiva y accesible.
          </p>
          <p>
            Nuestra aplicación permite a los usuarios reservar turnos en tiempo real, 
            visualizar disponibilidad de horarios y explorar recomendaciones de estilos 
            antes de realizar un cambio de imagen. Buscamos reducir tiempos de espera, 
            mejorar la organización de los establecimientos y brindar mayor seguridad 
            al cliente en su decisión.
          </p>
          <div className="about-text-footer">
            <span className="project-note">© SmartCut Project 2026</span>
            <img src="/logo_2_barber.jpeg" alt="Logo SmartCut" className="about-logo" />
          </div>
        </div>

        {/* Columna derecha: imagen */}
        <div className="about-image-column">
          <img src="/logo_3_barber.png" alt="Ilustración Quiénes somos" />
        </div>
      </div>
    </section>
  );
};

export default AboutSmartCut;