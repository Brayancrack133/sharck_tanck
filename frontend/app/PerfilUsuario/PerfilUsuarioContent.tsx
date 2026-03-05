"use client";

import React from "react";
import { useSearchParams } from "next/navigation";
import Footer from "../components/organism/Footer";
import Header from "../components/organism/Header";
import UsuarioMenu from "../components/UsuarioMenu";

export default function PerfilUsuarioContent() {
  const searchParams = useSearchParams();
  const idUsuario = searchParams?.get("id") ?? "";

  return (
    <div>
      <Header />
      <UsuarioMenu userId={idUsuario} />
      <Footer />
    </div>
  );
}