import { BrowserRouter } from 'react-router-dom';
import './App.css';
import { useState } from 'react';
 function Dashboad(){
return(
<BrowserRouter>
<Routes>
    <Route path="/" element={<Layout />}>
      <Route index element={<Home />} />
      <Route path="blogs" element={<Blogs />} />
      <Route path="contact" element={<Contact />} />
      <Route path="*" element={<NoPage />} />
    </Route>
  </Routes>
</BrowserRouter>
    );
}
export default Dashboad;