const endpoint = "http://app.localhost:8080/api/users";
// const endpoint = "http://127.0.0.1:8000/api/users";

const createUser = async (
  username: string,
  email: string,
  password: string,
) => {
  const res = await fetch(endpoint, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username, email, password }),
  });
  const data = await res.text();
  console.log(data);
  return data;
};

const getUsers = async () => {
  const res = await fetch(endpoint);
  const data = await res.text();
  console.log(data);
  return data;
};

const getUser = async (id: number) => {
  const res = await fetch(`${endpoint}/${id}`);
  const data = await res.text();
  console.log(data);
  return data;
};

const updateUser = async (
  id: number,
  username: string | null = null,
  email: string | null = null,
  password: string | null = null,
) => {
  const res = await fetch(`${endpoint}/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username, email, password }),
  });
  const data = await res.text();
  console.log(data);
  return data;
};

const deleteUser = async (id: number) => {
  const res = await fetch(`${endpoint}/${id}`, {
    method: "DELETE",
  });
  const data = await res.text();
  console.log(data);
  return data;
};

createUser("test", "deno-test@example.com", "password");
// getUsers();
// getUser(9);
// updateUser(9, "p");
// deleteUser(10);
