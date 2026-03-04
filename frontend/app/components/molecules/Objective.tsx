// src/components/molecules/Objective.tsx
import React from "react";
import "./Objective.css";

const Objective: React.FC = () => {
  return (
    <section id="objective-container" className="objective-container">
      <div className="objective-inner">
        {/* Columna izquierda: imagen */}
        <div className="objective-image-column">
          <img src="/obj.svg" alt="Ilustración Objetivo SkillNet" />
        </div>

        {/* Columna derecha: texto centrado */}
        <div className="objective-text-column">
          <h2>Objetivo</h2>
          <p>
            El objetivo de GlowUp es desarrollar e implementar una plataforma
            digital que optimice la gestión de citas en barberías y salones de
            belleza del municipio de La Paz, permitiendo a los usuarios reservar
            turnos en tiempo real, explorar estilos previamente y reducir los
            tiempos de espera, mejorando así la experiencia del cliente y la
            organización de los establecimientos.
          </p>
        </div>
      </div>
    </section>
  );
};

export default Objective;
