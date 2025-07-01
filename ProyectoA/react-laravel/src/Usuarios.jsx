import { useEffect, useState } from 'react';

function Usuarios() {
  // Estado para guardar los usuarios
  const [usuarios, setUsuarios] = useState([]);

  // useEffect se ejecuta una vez cuando el componente carga
  useEffect(() => {
    // Petición GET a tu API Laravel
    fetch('http://127.0.0.1:8000/api/usuarios')
      .then(response => response.json())
      .then(data => setUsuarios(data))
      .catch(error => console.error('Error:', error));
  }, []); // [] significa: solo al montar

  return (
    <div>
      <h1>Lista de Usuarios</h1>
      <table border="1" cellPadding="5">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre de Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Departamento</th>
          </tr>
        </thead>
        <tbody>
          {usuarios.map((usuario) => (
            <tr key={usuario.id_usuario}>
              <td>{usuario.id_usuario}</td>
              <td>{usuario.nombre_usuario}</td>
              <td>{usuario.nombre}</td>
              <td>{usuario.apellido}</td>
              <td>{usuario.departamento}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Usuarios;
