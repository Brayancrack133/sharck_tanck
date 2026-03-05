"use client";

import { Suspense } from "react";
import PerfilUsuarioContent from "./PerfilUsuarioContent";

export const dynamic = "force-dynamic";

export default function Page() {
  return (
    <Suspense fallback={<div>Cargando...</div>}>
      <PerfilUsuarioContent />
    </Suspense>
  );
}