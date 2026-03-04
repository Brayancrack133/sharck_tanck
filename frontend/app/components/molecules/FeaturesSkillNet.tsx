// src/components/molecules/FeaturesSkillNet.tsx
// src/components/molecules/FeaturesSkillNet.tsx
import React from "react";
import "./FeaturesSkillNet.css";

const FeaturesSkillNet: React.FC = () => {
  return (
    <section id="features-skillnet" className="features-skillnet">
      {/* Columna izquierda: título */}
      <div className="features-left">
        <h2>Algunas de las características más importantes de GlowUp</h2>
      </div>

      {/* Columna derecha: tarjetas */}
      <div className="features-right">
        <div className="features-cards">
          <div className="feature-card">
            <img
              src="/logo1_caracteristica.jpeg"
              alt="Icono gestión de convocatorias"
              className="feature-icon"
            />
            <p>
              Los usuarios pueden reservar citas fácilmente mediante un sistema
              de administracion digital que garantiza una asignacion de turnos
              organizada y optimizada.
            </p>
          </div>
          <div className="feature-card">
            <img
              src="/logo1_caracteristica.jpeg"
              alt="Icono perfil profesional"
              className="feature-icon"
            />
            <p>
              Utilizando analisis biometrico facial y Vision por Computadora,
              GlowUp ofrece recomendaciones de estilos personalizados segun las
              caracteristicas faciales del usuario.
            </p>
          </div>
          <div className="feature-card">
            <img
              src="/logo1_caracteristica.jpeg"
              alt="Icono plataforma intuitiva"
              className="feature-icon"
            />
            <p>
              Una plataforma completa que simplifica la administracion de citas
              y permite a los usuarios encontrar barberias y salones cercanos
              mediante geolocalizacion.
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};

export default FeaturesSkillNet;

<img
  src="/icon-gestion.svg"
  alt="Icono gestión de convocatorias"
  className="feature-icon"
/>;
